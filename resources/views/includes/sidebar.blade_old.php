
<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
         
 
            @if(isset($data['user_type']) && ($data['user_type'] == 'admin'))
                <ul class="pcoded-item pcoded-left-item">
                    
                     <li class="">
                        <a href="{{ url('admin/clientlist') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-list"></i>
                            </span>
                            <span class="pcoded-mtext">Client List</span>
                        </a>
                    </li>
                    
                    <li class="">
                        <a href="{{ url('admin/listreport') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-list"></i>
                            </span>
                            <span class="pcoded-mtext">Reports</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ url('admin/listtabs') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-list"></i>
                            </span>
                            <span class="pcoded-mtext">Tabs</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ url('admin/listcategory') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-list"></i>
                            </span>
                            <span class="pcoded-mtext">Categories</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ url('admin/listsubcategory') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-list"></i>
                            </span>
                            <span class="pcoded-mtext">Sub Categories</span>
                        </a>
                    </li>
                    
                    <li class="">
                        <a href="{{ url('admin/listkpireport') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-list"></i>
                            </span>
                            <span class="pcoded-mtext">KPI - Reports</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ url('admin/listkpitabs') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-list"></i>
                            </span>
                            <span class="pcoded-mtext">KPI - Tabs</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ url('admin/listkpicategory') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-list"></i>
                            </span>
                            <span class="pcoded-mtext">KPI - Categories</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ url('admin/listkpisubcategory') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                                <i class="feather icon-list"></i>
                            </span>
                            <span class="pcoded-mtext">KPI - Sub Categories</span>
                        </a>
                    </li>
                </ul>
            @else
                <ul class="pcoded-item pcoded-left-item">
                    <li>
                        <a href="{{ url('home') }}" class="waves-effect waves-dark"> <span class="pcoded-micon"> <i class="feather icon-home"></i> </span> <span class="pcoded-mtext">Home</span> </a>
                    </li>
                     {{-- <li class="">
                        <a href="{{ url('kpi') }}" class="waves-effect waves-dark"> <span class="pcoded-micon"> <i class="feather icon-list"></i> </span> <span class="pcoded-mtext">KPI</span> </a>
                    </li> --}}
                    <li class="pcoded-hasmenu">
                        <a href="#!"  class="waves-effect waves-dark"><span class="pcoded-micon"><i class="feather icon-list"></i> </span> <span class="pcoded-mtext">KPI</span></a>
                        <ul class="pcoded-submenu" style="display: none;">
                        <li class=""><a href="{{ url('kpi') }}" class="" >ShopManager Sales Review</a></li>
                        <li class=""><a href="{{ url('kpibranch') }}" class="" >Branch KPI Evolution</a></li>
                        </ul>
                        </li>
                    <li class="">
                        <a href="{{ url('reports') }}" class="waves-effect waves-dark"> <span class="pcoded-micon"> <i class="feather icon-list"></i> </span> <span class="pcoded-mtext">Reports</span> </a>
                    </li>
                    <li class="">
                        <a href="conversation.html" class="waves-effect waves-dark"> <span class="pcoded-micon"> <i class="feather icon-message-circle"></i> </span> <span class="pcoded-mtext">Conversation</span> </a>
                    </li>
                    <li class="">
                        <a href="information.html" class="waves-effect waves-dark"> <span class="pcoded-micon"> <i class="feather icon-message-square"></i> </span> <span class="pcoded-mtext">Information</span> </a>
                    </li>
                    <li class="">
                        <a href="notification.html" class="waves-effect waves-dark"> <span class="pcoded-micon"> <i class="feather icon-bell"></i> </span> <span class="pcoded-mtext">Notification</span> </a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->