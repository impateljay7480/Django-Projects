from django.urls import path
from user_management import views
urlpatterns = [
    path('apply/',views.apply,name='apply'),
    path('loan_status/',views.loan_status,name='loan_status')
    
]
