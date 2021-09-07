<div>
    <li class="list-group-item d-flex py-2">
        <div class="form-check">
            <label class="form-check-label mx-1 @if($isCompleted) text-decoration-line-through @endif" for="taskCheck{{$task->id}}">
                <input wire:click="toggle" @if($isCompleted) checked @endif  type="checkbox" class="form-check-input" id="taskCheck{{$task->id}}" />{{$task->task_name}}   </label>
        </div>
        <button wire:click="delete" type="button" class="btn btn-danger btn-sm py-0 px-2">
            <i class="fa fa-trash"></i>
            Delete
        </button>
    </li>
</div>
