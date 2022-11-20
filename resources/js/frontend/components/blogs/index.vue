<template>
    <div>
        <div class="row mb-2">
            <div class="col-md-6" v-for="(blog, index) in blogs" :key="'blog' + index">
                <div
                    class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">{{ blog.Category }}</strong>
                        <h3 class="mb-0">{{ blog.title.substring(0, 50) }}</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">{{ blog.short_description.substring(0, 100) }}</p>
                        <router-link :to="{name:'blogread',params:{id:blog.id}}" class="stretched-link">Continue reading</router-link>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img width="100%" height="100%" :src="$asseturl + blog.Images" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            blogs: {},
        }
    },
            watch: {
        '$route': {
            handler(newValue, oldValue) {
                if (this.$route.params.name) {
                    this.blogList(this.$route.params.name)
                }
            },
            deep: true
        }
    },
    methods: {
        blogList(cat = '') {
            axios.get(`/api/get/blog/list?cat=${cat}`)
                .then(({ data }) => {
                    this.blogs = data
                })
                .catch()
        },
    },
    mounted() {
        if (this.$route.params.name) {
            this.blogList(this.$route.params.name)
        }
    }
};
</script>
<style>
/* stylelint-disable selector-list-comma-newline-after */
.blog-header {
    line-height: 1;
    border-bottom: 1px solid #e5e5e5;
}
.blog-header-logo {
    font-family: "Playfair Display", Georgia, "Times New Roman", serif;
    font-size: 2.25rem;
}
.blog-header-logo:hover {
    text-decoration: none;
}
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Playfair Display", Georgia, "Times New Roman", serif;
}
.display-4 {
    font-size: 2.5rem;
}
@media (min-width: 768px) {
    .display-4 {
        font-size: 3rem;
    }
}
.nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
}
.nav-scroller .nav {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
}
.nav-scroller .nav-link {
    padding-top: .75rem;
    padding-bottom: .75rem;
    font-size: .875rem;
}
.card-img-right {
    height: 100%;
    border-radius: 0 3px 3px 0;
}
.flex-auto {
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
}
.h-250 {
    height: 250px;
}
@media (min-width: 768px) {
    .h-md-250 {
        height: 250px;
    }
}
/* Pagination */
.blog-pagination {
    margin-bottom: 4rem;
}
.blog-pagination>.btn {
    border-radius: 2rem;
}
/*
 * Blog posts
 */
.blog-post {
    margin-bottom: 4rem;
}
.blog-post-title {
    margin-bottom: .25rem;
    font-size: 2.5rem;
}
.blog-post-meta {
    margin-bottom: 1.25rem;
    color: #999;
}
/*
 * Footer
 */
.blog-footer {
    padding: 2.5rem 0;
    color: #999;
    text-align: center;
    background-color: #f9f9f9;
    border-top: .05rem solid #e5e5e5;
}
.blog-footer p:last-child {
    margin-bottom: 0;
}
</style>
