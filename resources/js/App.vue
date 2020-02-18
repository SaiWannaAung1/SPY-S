<template>
    <div>
        <nav class="navbar navbar-expand-sm bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                <router-link class="nav-link" to="/testhome">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/testabout">About</router-link>
                </li>

            </ul>
        </nav>

        <router-view></router-view>
    </div>

</template>
