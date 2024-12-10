<input type="checkbox" id="sidebar-toggle">
<div class="sidebar">
    <div class="sidebar-header">
        <h3 class="brand">
            <span>
                <h2>Soltify</h2>
            </span>
        </h3>
        <label for="sidebar-toggle" class="ti-menu-alt"></label>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="dashboard">
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="">
                    <span>Transactions<span>
                </a>
            </li>
            <li>
                <a href="wallet">
                    <span>Wallet</span>
                </a>
            </li>
            @if(auth()->user()->role == 1)
            <li>
                <a href="admin">
                    <span>
                        Admin Panel
                    </span>
                </a>
            </li>
            <li>
                <a href="coins">
                    <span>
                        Add Coin
                    </span>
                </a>
            </li>
            @endif
            <li>
                <a href="">
                    <span></span>
                    <span>Account</span>
                </a>
            </li>
            <li>
                <a href="logout">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>