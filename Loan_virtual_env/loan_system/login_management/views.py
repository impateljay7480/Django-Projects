from django.shortcuts import render,redirect,get_object_or_404
import re
from main_admin_management.models import bank_data,main_admin,blog_detail,blog_category
from login_management.models import user_registered,contact_us,blog_e
from user_management.models import comment
from django.contrib import messages
from django.http import HttpResponse
from django.db.models import Q
import random
from playsound import playsound
import smtplib
from gtts import gTTS
from rest_framework.response import Response
from rest_framework import viewsets
from login_management.serializer import user_serializer,contact_us_serializer
# Create your views here.

class user_api(viewsets.ModelViewSet):
    queryset = user_registered.objects.all()
    serializer_class = user_serializer

    def retrieve(self, request, *args, **kwargs):
        params = kwargs
        print(params['pk'])
        firstname = user_registered.objects.filter(firstname=params['pk'])
        print(firstname)
        serializer = user_serializer(firstname,many=True)
        print(serializer.data)
        return Response(serializer.data)

class contect_us_api(viewsets.ModelViewSet):
    queryset = contact_us.objects.all()
    serializer_class = contact_us_serializer

def u_primery_id_generator(n):
    u_pattern = '1234567890'
    number = ''.join(random.sample(u_pattern,n))
    if user_registered.objects.filter(u_primery_id = number).exists():
        return u_primery_id_generator()
    else:
        return number

def email_sender(reciver,message):
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.starttls()
    server.login('pateljay1612@gmail.com', 'pateljay0099')
    server.sendmail('pateljay1612@gmail.com',reciver,message)
    print('done email')
    server.quit()
        
def login(request):
    if request.method == "POST":
        try:
            user_data= user_registered.objects.get (Q(email = (request.POST.get('email')).strip()) | Q(phone = (request.POST.get('email')).strip()))
            if user_data.password == request.POST.get('password'):
                request.session['id'] = user_data.id
                print("Login Page",request.session['id'])
                return render(request,'login_management/index.html',{'user_data':user_data.firstname,'id':user_data.pk})
            else:
                messages.info(request,"Please Enter Valid Password")
                return redirect('/login/')
        except:
            messages.info(request,"Please Enter Valid Email id /phone number ")
            return redirect('/login/')
    return render(request,'login_management/login.html')


pattern = '^[a-z0-9]+[\._]?[a-z0-9]+[@]\w+[.]\w{2,3}$'
def register(request):
    if request.method == "POST":
        if request.POST.get('password') == request.POST.get('cpassword'):
            field_name = ['firstname','lastname','email','phone','cpassword']
            save_field = list(map(lambda x:(request.POST.get(x)).strip(),field_name))
            image_field = request.FILES.get('photo')
            u_primery_id = u_primery_id_generator(10)
            if save_field[3].isnumeric() and len(save_field[3]) > 9 and len(save_field[3]) < 11:
                if re.match(pattern,save_field[2]):
                    user_data = user_registered(u_primery_id =u_primery_id,firstname=save_field[0],lastname=save_field[1],email=save_field[2],phone=save_field[3],user_image=image_field,password=save_field[4])
                    user_data.save()
                    return redirect('/login/')
                else:
                    messages.info(request,"Please Enter Valid Email id")
                    return redirect('/register/')
            else:
                messages.info(request,"Please Enter Valid Phone Number")
                return redirect('/register/')
        else:
            messages.info(request,"Please Enter Same Password in Field")
            return redirect('/register/')
    return render(request,'login_management/register.html')

def index(request):
    if request.session.has_key('id'):
        user_data = get_object_or_404(user_registered,pk=request.session['id'])
        return render(request,'login_management/index.html',{'user_data':user_data.firstname,'id':user_data.pk})
    elif request.session.has_key('bank_admin'):
        bank_login = get_object_or_404(bank_data,id=request.session['bank_admin'])
        return render(request,'login_management/index.html',{'bank_admin_id':bank_login.pk,'bank_name':bank_login.bankname})
    elif request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        return render(request,'login_management/index.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username})
    return render(request,'login_management/index.html')

def aboutus(request):
    if request.session.has_key('id'):
        user_data = get_object_or_404(user_registered,pk=request.session['id'])
        return render(request,'login_management/about.html',{'user_data':user_data.firstname,'id':user_data.pk})
    elif request.session.has_key('bank_admin'):
        bank_login = get_object_or_404(bank_data,id=request.session['bank_admin'])
        return render(request,'login_management/about.html',{'bank_admin_id':bank_login.pk,'bank_name':bank_login.bankname})
    elif request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        return render(request,'login_management/about.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username})
    return render(request,'login_management/about.html')

def services(request):
    if request.session.has_key('id'):
        user_data = get_object_or_404(user_registered,pk=request.session['id'])
        return render(request,'login_management/services.html',{'user_data':user_data.firstname,'id':user_data.pk})
    elif request.session.has_key('bank_admin'):
        bank_login = get_object_or_404(bank_data,id=request.session['bank_admin'])
        return render(request,'login_management/services.html',{'bank_admin_id':bank_login.pk,'bank_name':bank_login.bankname})
    elif request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        return render(request,'login_management/services.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username})
    return render(request,'login_management/services.html')

def blog(request):
    blog_data = blog_detail.objects.all()
    b_category = blog_category.objects.all()
    recent_post = blog_detail.objects.all().order_by('-id')[0:4]
    if request.method == "POST":
        if request.POST.get('subscribe') == "subscribe":
            b_email = request.POST.get('b_email')
            if blog_e.objects.filter(email=b_email).exists():
                messages.error(request,'Already,You Are Subscriber')
                return redirect('/blog/')
            else:
                send_message = "Hello Subscriber, We will send our latest update everyday."
                email_sender(b_email,send_message)
                b_email_save = blog_e(email=b_email)
                b_email_save.save()
                messages.success(request,"Now,You are Subscriber")
                return redirect('/blog/')
        elif request.POST.get('search') == 'search':
            text = request.POST.get('search_text1')
            print(text)
            return redirect('/view_post/{c_name}/'.format(c_name=text))
            # return redirect('/view_post/{c_name}/'.format(c_name=text))
        else:
            print("lol")
            return redirect('/blog/')
    if request.session.has_key('id'):
        user_data = get_object_or_404(user_registered,pk=request.session['id'])
        return render(request,'login_management/blog.html',{'user_data':user_data.firstname,'id':user_data.pk,'blog_data':blog_data,'blog_category':b_category,'recent_post':recent_post})
    elif request.session.has_key('bank_admin'):
        bank_login = get_object_or_404(bank_data,id=request.session['bank_admin'])
        return render(request,'login_management/blog.html',{'bank_admin_id':bank_login.pk,'bank_name':bank_login.bankname,'blog_data':blog_data,'blog_category':b_category,'recent_post':recent_post})
    elif request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        return render(request,'login_management/blog.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username,'blog_data':blog_data,'blog_category':b_category,'recent_post':recent_post})
    return render(request,'login_management/blog.html',{'blog_data':blog_data,'blog_category':b_category,'recent_post':recent_post})

def contactus(request):
    if request.method == 'POST':
        email = request.POST.get('c_email')
        x = contact_us.objects.filter(c_email=email).count()
        print(x)
        if x > 2:
            messages.warning(request,"You are maximum time contact us. now you are do not contact with us.")
            return redirect('/contactus/')
        else:
            name = request.POST.get('c_name')
            message = request.POST.get('c_message')
            subject = request.POST.get('c_subject')
            contact_detail = contact_us(c_name=name ,c_email=email ,c_message=message ,c_subject=subject)
            contact_detail.save()
            send_message ="Thank you for contacting us. We have successfully received your email and someone from the customer service team will get back to as soon as possible." 
            email_sender(email,send_message)
            messages.success(request,"Thank you for contacting us. We have successfully received your email and someone from the customer service team will get back to as soon as possible.")
            return redirect('/contactus/')
    if request.session.has_key('id'):
        user_data = get_object_or_404(user_registered,pk=request.session['id'])
        return render(request,'login_management/contact.html',{'user_data':user_data.firstname,'id':user_data.pk})
    elif request.session.has_key('bank_admin'):
        bank_login = get_object_or_404(bank_data,id=request.session['bank_admin'])
        return render(request,'login_management/contact.html',{'bank_admin_id':bank_login.pk,'bank_name':bank_login.bankname})
    elif request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        return render(request,'login_management/contact.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username})
    return render(request,'login_management/contact.html')

def update(request):
    if request.session.has_key('id'):
        if request.method == "POST":
            user_data = get_object_or_404(user_registered,pk=request.session['id'])
            user_data.firstname = request.POST.get('firstname')
            user_data.lastname =request.POST.get('lastname')
            user_data.email =request.POST.get('email')
            user_data.phone = request.POST.get('phone')
            user_data.save()
            return redirect('/update/')
        user_data = get_object_or_404(user_registered,pk=request.session['id'])
        return render(request,'user_management/profile.html',{'id':user_data.pk,'user_data':user_data.firstname,'user_detail':user_data})
    return redirect('/')

def logout(request):
    if request.session.has_key('id'):
        del request.session['id']
        return redirect('/')
    elif request.session.has_key('bank_admin'):
        del request.session['bank_admin']
        return redirect('/bank_admin/')
    elif request.session.has_key('main_admin'):
        del request.session['main_admin']
        return redirect('/main_admin/')
    return redirect('/')

def emical(request):
    if request.method == "POST":
        amount = int(request.POST.get('amount'))
        month = int(request.POST.get('month'))
        rate = float(request.POST.get('rate'))
        m_rate = rate / (12 * 100)
        if request.POST.get('loantype') == "personal Loan":
            emi = int((amount*m_rate*(1+m_rate)**month)/(((1+m_rate)**month)-1))
            messages.info(request,f"You Personaal Loan EMI : {emi}")
            return redirect('/emical/')
        elif request.POST.get('loantype') == "Home Loan":
            emi = int((amount*m_rate*(1+m_rate)**month)/(((1+m_rate)**month)-1))
            messages.info(request,f"You Home Loan EMI : {emi}")
            return redirect('/emical/')
    if request.session.has_key('id'):
        user_data = get_object_or_404(user_registered,pk=request.session['id'])
        return render(request,'login_management/emical.html',{'user_data':user_data.firstname,'id':user_data.pk})
    elif request.session.has_key('bank_admin'):
        bank_login = get_object_or_404(bank_data,id=request.session['bank_admin'])
        return render(request,'login_management/emical.html',{'bank_admin_id':bank_login.pk,'bank_name':bank_login.bankname})
    elif request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        return render(request,'login_management/emical.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username})
    return render(request,'login_management/emical.html')

def view_post(request,c_name):
    particular_cat = blog_detail.objects.filter(b_category=c_name)
    b_category = blog_category.objects.all()
    recent_post = blog_detail.objects.all().order_by('-id')[0:4]
    if request.method == "POST":
        if request.POST.get('subscribe') == "subscribe":
            b_email = request.POST.get('b_email')
            if blog_e.objects.filter(email=b_email).exists():
                messages.error(request,'Already,You Are Subscriber')
                return redirect('/blog/')
            else:
                send_message = "Hello Subscriber, We will send our latest update everyday."
                email_sender(b_email,send_message)
                b_email_save = blog_e(email=b_email)
                b_email_save.save()
                messages.success(request,"Now,You are Subscriber")
                return redirect('/blog/')
        elif request.POST.get('search') == 'search':
            text = request.POST.get('search_text1')
            print(text)
            return redirect('/view_post/{c_name}/'.format(c_name=text))
            # return redirect('/view_post/{c_name}/'.format(c_name=text))
        else:
            print("lol")
            return redirect('/blog/')
    if request.session.has_key('id'):
        user_data = get_object_or_404(user_registered,pk=request.session['id'])
        return render(request,'login_management/blog.html',{'user_data':user_data.firstname,'id':user_data.pk,'particular_cat':particular_cat,'blog_category':b_category,'recent_post':recent_post})
    elif request.session.has_key('bank_admin'):
        bank_login = get_object_or_404(bank_data,id=request.session['bank_admin'])
        return render(request,'login_management/blog.html',{'bank_admin_id':bank_login.pk,'bank_name':bank_login.bankname,'particular_cat':particular_cat,'blog_category':b_category,'recent_post':recent_post})
    elif request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        return render(request,'login_management/blog.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username,'particular_cat':particular_cat,'blog_category':b_category,'recent_post':recent_post})
    return render(request,'login_management/blog.html',{'particular_cat':particular_cat,'blog_category':b_category,'recent_post':recent_post})

def view_blog_detail(request,id):
    particular_blog = get_object_or_404(blog_detail,pk=id)
    b_category = blog_category.objects.all()
    recent_post = blog_detail.objects.all().order_by('-id')[0:4]
    blog_comment = comment.objects.filter(post_id=id)
    no_comment = len(blog_comment)
    if request.method == "POST":
        if request.POST.get('subscribe') == "subscribe":
            b_email = request.POST.get('b_email')
            if blog_e.objects.filter(email=b_email).exists():
                messages.error(request,'Already,You Are Subscriber')
                return redirect('/blog/')
            else:
                send_message = "Hello Subscriber, We will send our latest update everyday."
                email_sender(b_email,send_message)
                b_email_save = blog_e(email=b_email)
                b_email_save.save()
                messages.success(request,"Now,You are Subscriber")
                return redirect('/blog/')
        elif request.POST.get('search') == 'search':
            text = request.POST.get('search_text1')
            print(text)
            return redirect('/view_post/{c_name}/'.format(c_name=text))
        elif request.POST.get('send_message') == 'send_message':
            print("message Button submit")
            user_data = get_object_or_404(user_registered, pk=request.session['id'])
            post_id = id
            c_name = user_data.firstname +' '+ user_data.lastname
            c_email = user_data.email
            c_image = user_data.user_image
            c_message = request.POST.get('comment')
            c_audio = request.POST.get('audio')
            audio = gTTS(c_message,lang=c_audio)
            audio_file_name = u_primery_id_generator(8)+".mp3"
            audio.save('media/comment_audio/{name}'.format(name=audio_file_name))
            comment_save = comment(post_id=post_id,c_name=c_name,c_email=c_email,c_image=c_image,c_message=c_message,audio_file_name=audio_file_name)
            comment_save.save()
            return redirect('/view_blog_detail/{c_name}/'.format(c_name=id))
        elif request.POST.get('play') == 'play':
            audio_name = request.POST.get('audio_name')
            playsound(f'media/comment_audio/{audio_name}')
        else:
            print("lol")
            return redirect('/view_post/{c_name}/'.format(c_name=id))
    if request.session.has_key('id'):
        user_data = get_object_or_404(user_registered,pk=request.session['id'])
        return render(request,'login_management/blog_detail.html',{'no_comment':no_comment,'blog_comment':blog_comment,'user_data':user_data.firstname,'id':user_data.pk,'particular_blog':particular_blog,'blog_category':b_category,'recent_post':recent_post})
    elif request.session.has_key('bank_admin'):
        bank_login = get_object_or_404(bank_data,id=request.session['bank_admin'])
        return render(request,'login_management/blog_detail.html',{'no_comment':no_comment,'blog_comment':blog_comment,'bank_admin_id':bank_login.pk,'bank_name':bank_login.bankname,'particular_blog':particular_blog,'blog_category':b_category,'recent_post':recent_post})
    elif request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        return render(request,'login_management/blog_detail.html',{'no_comment':no_comment,'blog_comment':blog_comment,'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username,'particular_blog':particular_blog,'blog_category':b_category,'recent_post':recent_post})
    return render(request,'login_management/blog_detail.html',{'no_comment':no_comment,'blog_comment':blog_comment,'particular_blog':particular_blog,'blog_category':b_category,'recent_post':recent_post})