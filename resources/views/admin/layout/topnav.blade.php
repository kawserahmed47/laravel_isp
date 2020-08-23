       <!-- Logo -->
      <a href="{{url('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>1</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>A1</b>Network</span>
      </a>
  


    
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
          <!--      <span class="label label-success">4</span>-->
            </a>
            <ul class="dropdown-menu">
          <!--    <li class="header">You have 4 messages</li>-->  
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start Contact -->
                    <a href="{{url('/viewcontact')}}">
                      <div class="pull-left">  
                      </div>
                      <h4>
                        View Contact message
                      </h4>
                    </a>
                  </li>
                  <!-- end Contact -->
                  <li><!-- start complain -->
                    <a href="{{url('/viewcomplain')}}">
                      <div class="pull-left">  
                      </div>
                      <h4>
                        View Complain Message
                      </h4>
                    </a>
                  </li>
                  <!-- end Complain -->
                </ul>
            </ul>
          </li>

            <!-- Notifications: style can be found in dropdown.less -->
           <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
            <!--   <span class="label label-warning">4</span> -->
            </a>
            <ul class="dropdown-menu">
        <!--    <li class="header">You have 4 messages</li>  -->  
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start Contact -->
                    <a href="{{url('/viewpackageOrder')}}">
                      <div class="pull-left">  
                      </div>
                      <h4>
                        View Package Order
                      </h4>
                    </a>
                  </li>
                  <!-- end Contact -->
                  <li><!-- start complain -->
                    <a href="{{url('/viewproductOrder')}}">
                      <div class="pull-left">  
                      </div>
                      <h4>
                      View Product Order
                      </h4>
                    </a>
                  </li>
                  <!-- end Complain -->
                </ul>
            </ul>
          </li>


          <!-- Notifications: style can be found in dropdown.less 
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                 
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>

          -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset($admin->img)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">   {{$admin->name}}
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset($admin->img)}}" class="img-circle" alt="User Image">
                <p>
           {{$admin->name}}
                </p>
              </li>
              <!-- Menu Body 
              <li class="user-body">
                <div class="row">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
                </div>
                -->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  {{-- <a href="{{URL::to('adminProfile/')}}" class="btn btn-default btn-flat">Profile</a> --}}
                <a href="{{url('/profileEdit')}}/{{$admin->id}}" class="btn btn-default btn-flat">Profile</a>

                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>

    </nav>