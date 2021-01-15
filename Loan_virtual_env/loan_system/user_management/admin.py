from django.contrib import admin
from user_management.models import loan_request_list,comment
# Register your models here.
admin.site.register(loan_request_list)
admin.site.register(comment)