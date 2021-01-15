from django.contrib import admin
from main_admin_management.models import main_admin,bank_data,main_bank,blog_category,blog_detail

admin.site.site_header = "Loan Management System"
admin.site.site_title = " LMS Admin Login"
admin.site.index_title = "Welcome To Loan Management System"


# Register your models here.

@admin.register(main_admin)
class main_admin(admin.ModelAdmin):
    list_display = ['username','password']

@admin.register(bank_data)
class bank_data(admin.ModelAdmin):
    list_display = ['bankname','pincode','state','district','city','mainbank']
    list_filter = ['bankname','pincode','state','district','city','mainbank']
    search_fields = ['pincode','bankname']

@admin.register(main_bank)
class main_bank(admin.ModelAdmin):
    list_display = ['main_bank_id','bankname','numberofbranch']

@admin.register(blog_detail)
class blog_detail(admin.ModelAdmin):
    list_display = ['b_category','b_tag','b_date','b_time']
    list_filter = ['b_category','b_tag','b_date']

@admin.register(blog_category)
class blog_category(admin.ModelAdmin):
    list_display = ['category_name','add_blog_in']

