<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i> <span>Dashboard</span>
                    
                </a>
            </li>
       
            @can('manage_startup')
            <li class="treeview {{ @$startup_active }}">
                <a href="#">
                    <i class="ti-paint-bucket"></i><span>Startup</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                
                <ul class="treeview-menu">
                    <li class="{{ @$ico_category_active }}"><a href="{{ url('admin/icocategory') }}"><span>ICO Category</span></a></li>                    
                </ul>   
                
                <ul class="treeview-menu">
                    @can('ico.index')
                    <li class="{{ @$ico_active }}"><a href="{{ url('admin/ico') }}"><span>Manage ICO</span></a></li>
                    @endcan
                </ul>                   
            </li>
            @endcan            
        </ul>
    </div> <!-- /.sidebar -->
</aside>
