<?php
if (isset($_COOKIE['notification'])) {
    $notice = $_COOKIE['notification'];
    $notice = explode(',', $notice);
}
?>
<div aria-live="assertive" aria-atomic="true" style="position: absolute; top: 50px; right: 10px; min-height: 200px;" id="areaToaster">
    <div class="toast" role="alert" data-autohide="false">
        <div class="toast-header">
            <!--<img src="..." class="rounded mr-2" alt="...">-->
            <strong class="mr-auto"><?php echo $notice[0]; ?></strong>
            <!--<small>11 mins ago</small>-->
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" onclick="Cookies.set('notification', null, null, '/');">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
        <?php echo $notice[1]; ?>
        </div>
    </div>
</div>

