<!-- <div class="container">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">         
        <?php //echo validation_errors('<div class="text-center text-danger">', '</div>'); ?>
        <?php 
       // if (isset($this->session->loginFailed)) {
         //   echo "<div class='text-center text-danger'>".$this->session->loginFailed."</div>";
        //}
        ?>
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
            </div>     
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginform" class="form-horizontal" role="form" method="post">
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="username or email">                             
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <button class="btn essence-btn" type="submit">Sign in</button>
                        </div>
                    </div> 
                </form>     
            </div>                     
        </div>  
    </div>
</div>
 -->
 
 <div class="container">
         <?php 
        if (isset($this->session->loginFailed)) {
           echo "<div class='text-danger'>".$this->session->loginFailed."</div>";
        }
        ?>
         <?php echo validation_errors('<div class="text-danger">', '</div>'); ?>
    <form action="" method="post">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email">Email<span>*</span></label>
                <input type="text" class="form-control" name ="email" id="email" value="" >
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="password">Password<span>*</span></label>
                <input type="password" class="form-control" id="password" name="password" value="" >
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <button class="btn essence-btn" type="submit">Sign in</button>
            </div>
        </div>
    </form>
</div>
