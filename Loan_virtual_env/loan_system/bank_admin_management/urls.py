from django.urls import path
from bank_admin_management import views
urlpatterns = [
    path('',views.bank_admin,name='bank_admin'),
    path('loan_list/',views.loan_list,name='loan_list'),
    path('loan_detail/<int:id>/',views.loan_detail,name='loan_detail'),
    path('not_approve/<int:id>/',views.not_approve,name='not_approve'),
    path('approve/<int:id>/',views.approve,name='approve'),

]
