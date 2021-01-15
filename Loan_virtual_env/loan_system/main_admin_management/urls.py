from django.urls import path
from main_admin_management import views
urlpatterns = [
    path('',views.admin,name='admin'),
    path('p_bank_list/<int:id>/',views.p_bank_list,name='p_bank_list'),
    path('user_list/',views.user_list,name='user_list'),
    path('add/<int:id>/',views.add,name='add'),
    path('delete/<int:id>/',views.delete,name='delete'),
    path('edit/<int:id>/',views.edit,name='edit'),
    path('add_main/',views.add_main,name='add_main'),
    path('bank_list/',views.bank_list,name='bank_list'),
    path('add_blog/',views.add_blog,name='add_blog'),
    path('add_blog_category/',views.add_blog_category,name='add_blog_category')
]
