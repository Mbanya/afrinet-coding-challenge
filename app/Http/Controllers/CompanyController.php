<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Models\Company;
use App\Models\User;
use App\Notifications\NewCompanyCreated;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Notification;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCompanyRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(CreateCompanyRequest $request)
    {
        //

        $request->validated();
        if ($request->hasFile('logo'))
        {
            $logo = $request->file('logo');
            $logo_name = time().'.'.$logo->extension();

            $logo_path = storage_path('app/public/company_logos');

            $img = Image::make($logo->path());
            $img->resize(100,100, function ($const){
                $const->aspectRatio();
            })->save($logo_path.'/'.$logo_name);
        }else{
            $logo_name = null;
        }
        $company = Company::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'logo' => $logo_name,
            'website'=>$request->input('website'),
        ]);

        $companies = Company::all();

        $admin = User::where('is_admin',1)->get();
        Notification::send($admin, new NewCompanyCreated($company));
//        $admin->notify(new NewCompanyCreated($company));

        return view('company.index')->with(['success'=>'Company created successfully','companies'=>$companies]);
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Company $company)
    {
        //
        return view('company.edit',compact('company'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateCompanyRequest $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreateCompanyRequest $request, Company $company): \Illuminate\Http\RedirectResponse
    {
        //
        $request->validated();

        if ($request->hasFile('logo'))
        {
            $logo = $request->file('logo');
            $logo_name = time().'.'.$logo->extension();

            $logo_path = storage_path('app/public/company_logos');

            $img = Image::make($logo->path());
            $img->resize(100,100, function ($const){
                $const->aspectRatio();
            })->save($logo_path.'/'.$logo_name);
        }

        $data = Company::find($company->id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->website = $request->input('website');
        $data->logo = $logo_name;

        $data->save();

        return  redirect()->back()->with(['success'=> 'Company Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCompany(Request $request): \Illuminate\Http\JsonResponse
    {
        //
        Company::find($request->id)->delete();
        return response()->json();
    }
}
