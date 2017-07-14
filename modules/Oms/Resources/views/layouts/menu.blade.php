<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <div style="overflow:scroll;height:100%;overflow-x: hidden;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
<!--            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
        </div>
        <div class="pull-left info">
<!--            <p>{{$session['name']}}</p>-->
            <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->

    <ul class="sidebar-menu">
        <li>
            <a href="{{route('oms.dashboard')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        
<!--        <li class="treeview">
            <a href="#">
                <i class="fa fa-database"></i> <span>ES</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{route('oms.brandES')}}">
                        <i class="fa fa-database"></i> <span>Brand ES</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{route('oms.colorES')}}">
                        <i class="fa fa-database"></i> <span>Color ES</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{route('oms.productES')}}">
                        <i class="fa fa-database"></i> <span>Product ES</span>
                    </a>
                </li>
            </ul>            
        </li>-->
        
        <li class="treeview">
            <a href="#">
                <i class="fa fa-database"></i> <span>Market Place</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{route('oms.brandMP')}}">
                        <i class="fa fa-database"></i> <span>Brand</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('oms.colorMP')}}">
                        <i class="fa fa-database"></i> <span>Color</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('oms.categoryMP')}}">
                        <i class="fa fa-database"></i> <span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('oms.product')}}">
                        <i class="fa fa-database"></i> <span>Product</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('oms.storeMP')}}">
                        <i class="fa fa-database"></i> <span>Store</span>
                    </a>
                </li>
            </ul>            
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-shopping-bag"></i> <span>Order List</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{route('oms.orderList')}}">
                        <i class="fa fa-shopping-bag"></i> <span>Order List</span>
                    </a>
                </li>
            </ul>            
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cog"></i> <span>Configuration</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('oms.role')}}"><i class="fa fa-cog"></i> Role</a></li>
                <li>
                    <a href="{{route('oms.changepassword')}}">
                        <i class="fa fa-key"></i> <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('oms.userOMS')}}"><i class="fa fa-fw fa-user"></i>
                        <span> User</span>
                    </a>
                </li>
            </ul>            
        </li>
    </ul>
    </div>
</section>
<!-- /.sidebar -->

