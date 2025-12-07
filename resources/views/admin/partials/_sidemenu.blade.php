<div class="card text-center" style="min-height: 100vh">
    <div class="card-title" style="padding: 20px 5px;">
        <h2>Panel</h1>
        <hr>
    </div>
    <div class="card-body">
        <ul class="sidemenu-list">
            <li><a href="{{ route('home') }}"><i class="fa fa-star"></i> New Orders</a></li>
            <li><a href="{{ route('admin.orders.accepted') }}"><i class="fa fa-check"></i> Accepted Orders</a></li>
            <li><a href="{{ route('admin.messages') }}"><i class="fa fa-envelope"></i>  Messages</a></li>
            <li><a href="{{ route('admin.faq') }}"><i class="fa fa-question-circle"></i> FAQs</a></li>
            <li><a href="{{ route('admin.faq.create') }}"><i class="fa fa-plus-circle"></i> Add New FAQs</a></li>

            <li><a href="{{ route('admin.services') }}"><i class="fa fa-cog"></i> Services</a></li>
            <!-- <li><a href="{{ route('admin.services.create') }}"><i class="fa fa-plus-circle"></i> Add New Service</a></li> -->

            
            <li><a href="{{ route('admin.blog') }}"><i class="fa fa-blog"></i> Blog Posts</a></li>
            <li><a href="{{ route('admin.blog.create') }}"><i class="fa fa-plus-circle"></i> Add New Blog</a></li>

            
        </ul>
    </div>
</div>