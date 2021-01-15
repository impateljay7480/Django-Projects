from django.db import models

# Create your models here.

class user_registered(models.Model):
    u_primery_id = models.CharField(max_length = 10,default='')
    firstname = models.CharField(max_length=20) 
    lastname = models.CharField(max_length=20) 
    email = models.EmailField(max_length=50)
    phone = models.CharField(max_length=10)
    user_image = models.ImageField(upload_to='user_image',default='')
    password = models.CharField(max_length=15)

    def __str__(self):
        return self.email

class contact_us(models.Model):
    c_name = models.CharField(max_length=20)
    c_email = models.EmailField(max_length=20)
    c_subject = models.CharField(max_length=100)
    c_message = models.CharField(max_length=500)

    def __str__(self):
        return self.c_name

class blog_e(models.Model):
    email = models.EmailField(max_length=50)

    def __str__(self):
        return self.email

