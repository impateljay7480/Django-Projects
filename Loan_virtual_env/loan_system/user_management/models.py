from django.db import models
# Create your models here.

class loan_request_list(models.Model):
    u_primery_id = models.CharField(max_length=10)
    approved_loan = models.CharField(max_length=10,default='Peanding')
    loantype = models.CharField(max_length=20)
    firstname= models.CharField(max_length=20)
    lastname= models.CharField(max_length=20)
    radio = models.CharField(max_length=10)
    email = models.EmailField(max_length=50)
    phone= models.CharField(max_length=10)
    maritalstatus= models.CharField(max_length=15)
    dob = models.DateField()
    professional= models.CharField(max_length=20)
    address= models.CharField(max_length=500)
    city= models.CharField(max_length=20)
    district= models.CharField(max_length=20)
    state= models.CharField(max_length=20)
    pincode= models.CharField(max_length=6)
    income= models.CharField(max_length=100)
    l_amount= models.CharField(max_length=100)
    l_tenure= models.CharField(max_length=100)
    l_interest_rate= models.CharField(max_length=50)
    b1 = models.CharField(max_length=100,null=True)

    def __str__(self):
        return self.city

class comment(models.Model):
    post_id = models.IntegerField()
    c_name = models.CharField(max_length=20)
    c_email = models.EmailField(max_length=50)
    c_image = models.ImageField(upload_to='user_comment_images')
    c_message = models.CharField(max_length=500)
    audio_file_name = models.CharField(max_length=10,default='hey')
    c_datetime =models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return self.c_name