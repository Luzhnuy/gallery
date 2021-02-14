<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/add-tags" class="nav-item nav-link">Add Tag</router-link>
                    <router-link to="/add-photo" class="nav-item nav-link">Add photo</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view></router-view>
    </div>
</template>

<script>
export default {}
</script>
