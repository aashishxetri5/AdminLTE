<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/users" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Users</p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-tree-fill"></i>
                        <p>
                            UI Elements
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./UI/general.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./UI/icons.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./UI/timeline.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>
                            Forms
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('complain.index')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Complain Form</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="register" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Registration Form</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-table"></i>
                        <p>
                            Tables
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./tables/simple.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('showComplains')}}" class="nav-link">
                        <i class="nav-icon bi bi-envelope"></i>
                        <p>Complaints</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-bookshelf"></i>
                        <p>
                            Library
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('books.index')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Books</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('authors.index')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Authors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('genres.index')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Genres</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Borrow Records</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>My Borrows</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-header">DOCUMENTATIONS</li>
                <li class="nav-item">
                    <a href="./docs/introduction.html" class="nav-link">
                        <i class="nav-icon bi bi-download"></i>
                        <p>Installation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./docs/layout.html" class="nav-link">
                        <i class="nav-icon bi bi-grip-horizontal"></i>
                        <p>Layout</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./docs/color-mode.html" class="nav-link">
                        <i class="nav-icon bi bi-star-half"></i>
                        <p>Color Mode</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-ui-checks-grid"></i>
                        <p>
                            Components
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./docs/components/main-header.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Main Header</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./docs/components/main-sidebar.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Main Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-filetype-js"></i>
                        <p>
                            Javascript
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./docs/javascript/treeview.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Treeview</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="./docs/browser-support.html" class="nav-link">
                        <i class="nav-icon bi bi-browser-edge"></i>
                        <p>Browser Support</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./docs/how-to-contribute.html" class="nav-link">
                        <i class="nav-icon bi bi-hand-thumbs-up-fill"></i>
                        <p>How To Contribute</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./docs/faq.html" class="nav-link">
                        <i class="nav-icon bi bi-question-circle-fill"></i>
                        <p>FAQ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./docs/license.html" class="nav-link">
                        <i class="nav-icon bi bi-patch-check-fill"></i>
                        <p>License</p>
                    </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>
                            Level 1
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>
                                    Level 2
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-record-circle-fill"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-record-circle-fill"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-record-circle-fill"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li> -->
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->