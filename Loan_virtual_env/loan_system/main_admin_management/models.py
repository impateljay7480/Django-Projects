from django.db import models
# Create your models here.
class main_admin(models.Model):
    username = models.CharField(max_length=12)
    password = models.CharField(max_length=15)

    def __str__(self):
        return self.username

class main_bank(models.Model):
    bankname = models.CharField(max_length=20)
    main_bank_id = models.CharField(max_length=8,default='')
    numberofbranch = models.CharField(max_length=20,default='0')

    def __str__(self):
        return self.bankname 

class bank_data(models.Model):
    bankname = models.CharField(max_length=20)
    pincode = models.CharField(max_length=6)
    state = models.CharField(max_length=15)
    city = models.CharField(max_length=15)
    district = models.CharField(max_length=20)
    bankcode = models.CharField(max_length=10)
    password = models.CharField(max_length=10)
    mainbank = models.BooleanField(null=True,default=False)

    def __str__(self):
        return self.city

class blog_category(models.Model):
    category_name = models.CharField(max_length=20)
    add_blog_in = models.PositiveIntegerField(blank=True,default=3)

    def __str__(self):
        return self.category_name

class blog_detail(models.Model):
    b_category = models.CharField(max_length=20)
    b_image = models.ImageField(upload_to = 'blog_images',default='')
    b_subject = models.CharField(max_length=200)
    b_tag = models.CharField(max_length=20)
    b_description = models.CharField(max_length=2000)
    b_date = models.DateField()
    b_time = models.TimeField()

    def __str__(self):
        return self.b_subject


