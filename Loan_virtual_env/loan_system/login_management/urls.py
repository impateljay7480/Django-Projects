from django.urls import path,include
from login_management import views
from rest_framework import routers

router = routers.DefaultRouter()
router.register('user_api',views.user_api)
router.register('contect_us_api',views.contect_us_api)


urlpatterns = [
    path('api/',include(router.urls)),
    path('',views.index,name='index'),
    path('aboutus/',views.aboutus,name='aboutus'),
    path('services/',views.services,name='services'),
    path('blog/',views.blog,name='blog'),
    path('contactus/',views.contactus,name='contactus'),
    path('login/',views.login,name='login'),
    path('register/',views.register,name='register'),
    path('update/',views.update,name='update'),
    path('logout/',views.logout,name='logout'),
    path('emical/',views.emical,name='emical'),
    path('view_post/<c_name>/',views.view_post,name='view_post'),
    path('view_blog_detail/<int:id>/',views.view_blog_detail,name='view_blog_detail'),
]