
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
                                <i class="feather icon-list"pcoded-micon></i>
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
                    <li class="pcoded-hasmenu">
                    <a href="#!"  class="waves-effect waves-dark"><span class="pcoded-micon"><i class="feather icon-list"></i> </span> <span class="pcoded-mtext">KPI</span></a>
                    <ul class="pcoded-submenu" style="display: none;">
                    {{-- <li class=""><a href="{{ url('kpi') }}" class="" >ShopManager Sales Review</a></li>
                    <li class=""><a href="{{ url('kpibranch') }}" class="" >Branch KPI Evolution</a></li> --}}
                    {{-- <li class=""><a href="layout-menu-fixed.html" class="" >sub3</a></li>
                    <li class=""><a href="layout-mini-menu.html" class="">sub4</a></li> --}}
                    </ul>
                    </li>

                    <li class="pcoded-hasmenu">
                        <a href="#!"  class="waves-effect waves-dark"><span class="pcoded-micon"><i class="feather icon-list"></i> </span> <span class="pcoded-mtext">Reports</span></a>
                        @php
                        
                        $admin_helper = new \App\Models\AdminHelper();
                        $categories =$admin_helper->getReportsTabList();
                        //dd($categories)
                        @endphp
                        <ul class="pcoded-submenu" style="display: none;">
                            @foreach($categories as $category)
                            <li class=""><a href="{{ url('individualreport',$category->category_id) }}" class="" >{{ $category->name}}</a></li>
                            @endforeach
                        </ul>
                        </li>
                     <!-- <li class="">
                        <a href="#" data-toggle="dropdown" class="waves-effect waves-dark"> <span class="pcoded-micon"> <i class="feather icon-list"></i> </span> <span class="pcoded-mtext dropdown-item dropdown-toggle">KPI</span> 
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('kpi') }}" class="dropdown-item">level 1</a></li>
                                <li><a href="#" class="dropdown-item">level 2</a></li>
                            </ul>
                        </a>
                    </li> -->
                    {{-- <li class="">
                        <a href="{{ url('reports') }}" class="waves-effect waves-dark"> <span class="pcoded-micon"> <i class="feather icon-list"></i> </span> <span class="pcoded-mtext">Reports</span> </a>
                    </li> --}}
                    <li class="">
                        <a href="conversation.html" class="waves-effect waves-dark"> <span class="pcoded-micon"> <i class="feather icon-message-circle"></i> </span> <span class="pcoded-mtext">Conversation</span> </a>
                    </li>
                    <li class="">
                        <a href="information.html" class="waves-effect waves-dark"> <span class="pcoded-micon"> <i class="feather icon-message-square"></i> </span> <span class="pcoded-mtext">Information</span> </a>
                    </li>
                    <li class="">
                        <a href="#" role="button"  class="waves-effect waves-dark"> <span class="pcoded-micon"> <i class="feather icon-bell"></i> </span> <span class="pcoded-mtext">Notification</span> </a>
                        
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->