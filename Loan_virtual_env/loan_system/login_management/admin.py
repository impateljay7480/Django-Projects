from django.contrib import admin
from login_management.models import user_registered,contact_us,blog_e
# Register your models here.
admin.site.register(user_registered)
admin.site.register(contact_us)
admin.site.register(blog_e)