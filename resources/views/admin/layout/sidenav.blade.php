  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset($admin->img)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{$admin->name}}</p>
          <a href="{{url('/dashboard')}}"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>         
        <hr>
      
<!--
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>About</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-edit"></i>Add About text</a></li>
           
          </ul>
        
          
        </li>
        -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/addSlider')}}"><i class="fa fa-eye"></i>Add Slider</a></li>
            <li><a href="{{url('/viewSlider')}}"><i class="fa fa-eye"></i>View Slider</a></li>           
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>Support Team</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/addSupport')}}"><i class="fa fa-edit"></i>Add Member</a></li>
            <li><a href="{{url('/viewSupport')}}"><i class="fa fa-eye"></i> Show Members</a></li>
           
          </ul>
        </li>
       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>Packages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/addPackage')}}"><i class="fa fa-edit"></i>Add Packages</a></li>
            <li><a href="{{url('/viewPackage')}}"><i class="fa fa-eye"></i> Show Package</a></li>
           
          </ul>
        </li>
       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>Media Server</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/addMsubcategory')}}"><i class="fa fa-edit"></i>Add MediaCategory</a></li>
            <li><a href="{{url('/viewMsubcategory')}}"><i class="fa fa-eye"></i> Show MediaCategory</a></li>
           
            <li><a href="{{url('/addMedia')}}"><i class="fa fa-edit"></i>Add Media Server</a></li>
            <li><a href="{{url('/viewMedia')}}"><i class="fa fa-eye"></i> Show Media Server</a></li>
           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>Product Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/addPsubcategory')}}"><i class="fa fa-edit"></i>Add ProductCategory</a></li>
            <li><a href="{{url('/viewPsubcategory')}}"><i class="fa fa-eye"></i> Show ProductCategory</a></li>
           
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/addProduct')}}"><i class="fa fa-edit"></i>Add Products</a></li>
            <li><a href="{{url('/viewProduct')}}"><i class="fa fa-eye"></i> Show Products</a></li>
           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/viewproductOrder')}}"><i class="fa fa-eye"></i>Products Order</a></li>
            <li><a href="{{url('/viewpackageOrder')}}"><i class="fa fa-eye"></i>Package Order</a></li>
           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>Message</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/viewcomplain')}}"><i class="fa fa-eye"></i>Complain Message</a></li>
            <li><a href="{{url('/viewcontact')}}"><i class="fa fa-eye"></i>Contact Message</a></li>           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          @if( $admin->level==1)
          <ul class="treeview-menu">
            <li><a href="{{url('/adminRegister')}}"><i class="fa fa-eye"></i>Admin Register</a></li>
            <li><a href="{{url('/adminView')}}"><i class="fa fa-eye"></i>Admin View</a></li>           
          </ul>
          @endif
        </li>

     

{{--         <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li> --}}
        
        
     
{{--         <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a>
        </li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>