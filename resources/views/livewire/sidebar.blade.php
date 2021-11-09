<nav id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}">
            <span class="title font-sans"><b>NH</b> Dashboard</span>
        </a>
    </div>
    <ul class="list-unstyled components">
        <li class=" active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle">Authentication</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{ route('users') }}">User</a>
                </li>
                <li>
                    <a href="#">Role</a>
                </li>
                <li>
                    <a href="#">Permission</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Portfolio</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
    </ul>
</nav>
