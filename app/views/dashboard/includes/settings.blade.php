<div class="sidebar-section">
    <h2 class="text-light">Settings</h2>
    <form action="index.html" method="post" class="form-horizontal form-control-borderless" onsubmit="return false;">
        <div class="form-group">
            <label class="col-xs-7 control-label-fixed">Notifications</label>
            <div class="col-xs-5">
                <label class="switch switch-success"><input type="checkbox" checked><span></span></label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-7 control-label-fixed">Public Profile</label>
            <div class="col-xs-5">
                <label class="switch switch-success"><input type="checkbox" checked><span></span></label>
            </div>
        </div>
         <div class="form-group">
            <label class="col-xs-7 control-label-fixed">Enable API</label>
            <div class="col-xs-5">
                <label class="switch switch-success"><input type="checkbox"><span></span></label>
            </div>
        </div> 
        <div class="form-group remove-margin">
            <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="App.sidebar('close-sidebar-alt');">Save</button>
        </div>
    </form>
</div>