<div class="row">
    <div class="col-md-offset-2 col-md-10">
        <form method="post" action="<?php echo "?req=home/add" ?>" class="form-horizontal text-center">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-6">
                <input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>" class="form-control"  placeholder="Work Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Start</label>
                <div class="col-sm-6">
                <input type="date" name="start_date" value="<?php echo isset($_POST['start_date']) ? $_POST['start_date'] : date('Y-m-d') ?>" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">End</label>
                <div class="col-sm-6">
                <input type="date" name="end_date" value="<?php echo isset($_POST['end_date']) ? $_POST['end_date'] : date('Y-m-d') ?>" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                <button type="submit" class="btn btn-success">Add</button>
                <a class="btn btn-info" href="?req=home/index" role="button">Back to home page</a>

                </div>
            </div>
        </form>
    </div>
</div>
