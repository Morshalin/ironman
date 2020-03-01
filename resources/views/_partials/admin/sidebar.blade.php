<aside class="app-sidebar">
      <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{auth()->user()->image? asset('storage/user/photo/'.auth()->user()->image):'https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg'}}" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{auth()->user()->name?auth()->user()->name:'John Doe'}}</p>
          <p class="app-sidebar__user-designation">{{getUserRoleName(auth()->user()->id)?getUserRoleName(auth()->user()->id):'Admin'}}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item {{ Request::is('home') ? ' active' : '' }}" href="{{ route('home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">{{_lang('Dashboard')}}</span></a></li>
        {{-- ==========slide ========== --}}
        <li><a class="app-menu__item {{ Request::is('admin/slider') ? ' active' : '' }}" href="{{ route('admin.slider.index') }}"><i class="app-menu__icon fa fa-sliders" aria-hidden="true"></i><span class="app-menu__label">{{_lang('Slider Management')}}</span></a></li>
        {{-- =========End Slider ========== --}}
        
        {{-- nav bar category start --}}
          <li class="treeview {{ Request::is('admin/nav-category*') ? ' is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-times"></i><span class="app-menu__label">{{_lang('Category Manage')}}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

            <li class="mt-1"><a class="treeview-item {{Request::is('admin/nav-category/category*') ? 'active':''}}" href="{{ route('admin.category.index') }}"><i class="icon fa fa-circle-o"></i> {{_lang('All Category')}}</a>
            </li>

            <li class="mt-1"><a class="treeview-item {{Request::is('admin/nav-category/subcategory*') ? 'active':''}}" href="{{ route('admin.subcategory.index') }}"><i class="icon fa fa-circle-o"></i> {{_lang('All Sub Category')}}</a>
            </li>

          </ul>
        </li>
        {{-- nav bar category End --}}

         {{-- Event  start --}}
          <li class="treeview {{ Request::is('admin/event-manage*') ? ' is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-times"></i><span class="app-menu__label">{{_lang('Event Manage')}}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

            <li class="mt-1"><a class="treeview-item {{Request::is('admin/event-manage/event*') ? 'active':''}}" href="{{ route('admin.event.index') }}"><i class="icon fa fa-circle-o"></i> {{_lang('All Event')}}</a>
            </li>

            <li class="mt-1"><a class="treeview-item {{Request::is('admin/event-manage/studium*') ? 'active':''}}" href="{{ route('admin.studium.index') }}"><i class="icon fa fa-circle-o"></i> {{_lang('All Studium')}}</a>
            </li>

            {{-- <li class="mt-1"><a class="treeview-item {{Request::is('admin/event-manage/club*') ? 'active':''}}" href="{{ route('admin.club.index') }}"><i class="icon fa fa-circle-o"></i> {{_lang('All Club')}}</a>
            </li> --}}

           {{--  <li class="mt-1"><a class="treeview-item {{Request::is('admin/event-manage/upcomingmatch*') ? 'active':''}}" href="{{ route('admin.upcomingmatch.index') }}"><i class="icon fa fa-circle-o"></i> {{_lang('Upcoming Match')}}</a>
            </li> --}}

          </ul>
        </li>
        {{--  Event End --}}
       

       {{--  <li class="treeview {{ Request::is('admin/user*') ? ' is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-times"></i><span class="app-menu__label">{{_lang('role_and_permission')}}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
            <li class="mt-1"><a class="treeview-item {{Request::is('admin/user/role*') ? 'active':''}}" href="{{ route('admin.user.role') }}"><i class="icon fa fa-circle-o"></i> {{_lang('role_permission')}}</a>
            </li>
            <li class="mt-1"><a class="treeview-item {{(Request::is('admin/user*') And !Request::is('admin/user/role*'))  ?'active':''}}" href="{{ route('admin.user.index') }}"><i class="icon fa fa-circle-o"></i>{{_lang('user')}}</a></li>
          </ul>
        </li> --}}
        {{-- ==========News Management ========== --}}
        <li><a class="app-menu__item {{ Request::is('admin/latestnews*') ? ' active' : '' }}" href="{{ route('admin.news.index') }}"><i class="app-menu__icon fa fa-newspaper-o" aria-hidden="true"></i><span class="app-menu__label">{{_lang('Latest News Management')}}</span></a></li>
        {{-- =========End News Management ========== --}}
        {{-- ==========Gallery ========== --}}
        <li><a class="app-menu__item {{ Request::is('admin/gallery') ? ' active' : '' }}" href="{{ route('admin.gallery.index') }}"> <i class="app-menu__icon fa fa-picture-o" aria-hidden="true"></i><span class="app-menu__label">{{_lang('Gallery Management')}}</span></a></li>
        {{-- =========End Gallery ========== --}}
        {{-- ==========About Us ========== --}}
        <li><a class="app-menu__item {{ Request::is('admin/about/index') ? ' active' : '' }}" href="{{ route('admin.about.index') }}"><i class="app-menu__icon fa fa-address-card-o" aria-hidden="true"></i><span class="app-menu__label">{{_lang('About Us')}}</span></a></li>
        {{-- =========End About Us ========== --}}
        {{-- ==========Contact  Us ========== --}}
        <li><a class="app-menu__item {{ Request::is('admin/contact/index') ? ' active' : '' }}" href="{{ route('admin.contact.index') }}"><i class="app-menu__icon fa fa-address-card-o" aria-hidden="true"></i><span class="app-menu__label">{{_lang('Contact Message')}}</span></a></li>
        {{-- =========End Contact Us ========== --}}
        {{-- ==========subscriber Us ========== --}}
        <li><a class="app-menu__item {{ Request::is('admin/subscriber/index') ? ' active' : '' }}" href="{{ route('admin.subscriber.index') }}"><i class="app-menu__icon fa fa-address-card-o" aria-hidden="true"></i><span class="app-menu__label">{{_lang('Subscriber List')}}</span></a></li>
        {{-- =========End subscriber Us ========== --}}
         <li><a class="app-menu__item {{ Request::is('admin/setting') ? ' active' : '' }}" href="{{ route('admin.setting') }}"><i class="app-menu__icon fa fa-cogs" aria-hidden="true"></i><span class="app-menu__label">{{_lang('setting')}}</span></a></li>

          <li><a class="app-menu__item {{ Request::is('admin/language*') ? ' active' : '' }}" href="{{ route('admin.language') }}"><i class="app-menu__icon fa fa-language" aria-hidden="true"></i><span class="app-menu__label">{{_lang('language')}}</span></a></li>

           <li><a class="app-menu__item {{ Request::is('admin/backup') ? ' active' : '' }}" href="{{ route('admin.backup') }}"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">{{_lang('backup')}}</span></a></li>
      </ul>
    </aside>