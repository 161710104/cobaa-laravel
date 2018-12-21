<style type="text/css">
	.alert-danger {
    background-color: #f2dede;
    border-color: #ebccd1;
    color: #a94442;
    margin-left: -15px;
    width: 970px;
	}
</style>
@if (session()->has('flash_notification.message'))
    <div class="container">
        <div class="alert alert-{{ session()->get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! session()->get('flash_notification.message') !!}
        </div>
    </div>
@endif