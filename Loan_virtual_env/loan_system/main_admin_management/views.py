from django.shortcuts import render,redirect,get_object_or_404
from main_admin_management.models import main_admin,bank_data,main_bank,blog_category,blog_detail
from login_management.models import user_registered
from django.http import HttpResponse
from django.contrib import messages
import random
import datetime 
# Create your views here.

def password_generator(n):
    pattern ='1234567890abcd@#'
    password = ''.join(random.sample(pattern,n))
    return password

def code_generator():
    pattern ='1234567890'
    code = ''.join(random.sample(pattern,6))
    return code


def admin(request):
    if request.method == "POST":
        try:
            admin_data = get_object_or_404(main_admin,username=request.POST.get('username'))
            if admin_data.password == request.POST.get('password'):
                request.session['main_admin'] = admin_data.pk 
                return render(request,'login_management/index.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username})
            else:
                messages.info(request,'Please Enter Valid Password')
                return redirect('/main_admin/')
        except:
            messages.info(request,'Please Enter Valid Username')
            return redirect('/main_admin/')
    return render(request,'main_admin_management/admin_login.html')

def p_bank_list(request,id):
    if request.session.has_key('main_admin'):
        main_bank_detail = get_object_or_404(main_bank,pk=id)
        all_branch = bank_data.objects.filter(bankname = main_bank_detail.bankname)
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        return render(request,'main_admin_management/p_bank_list.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username,'all_branch':all_branch,'main_bank_id':id})
    else:
        return redirect('/main_admin/')

def add(request,id):
    if request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        main_bank_detail = get_object_or_404(main_bank,pk=id)
        if request.method == "POST":
            field_name = ['bankname','pincode','city','state','district','mainbank']
            save_field = list(map(lambda x : request.POST.get(x),field_name))
            password = password_generator(10)
            code = code_generator()
            bank_detail = bank_data(bankname=save_field[0],pincode=save_field[1],state=save_field[3],city=save_field[2],password = password,bankcode=code,district=save_field[4],mainbank=save_field[5])
            bank_detail.save()
            branch_of_bank = len(bank_data.objects.filter(bankname=request.POST.get('bankname')))
            # print(branch_of_bank)
            main_bank.objects.filter(bankname=request.POST.get('bankname')).update(numberofbranch=branch_of_bank)
            return redirect('/main_admin/p_bank_list/{id}'.format(id=id))
        return render(request,'main_admin_management/addbank.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username,'main_bank_name':main_bank_detail.bankname})
    else:
        return redirect('/main_admin/')

def delete(request,id):
    if request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        if user_registered.objects.filter(phone=id).exists():
            user_data = get_object_or_404(user_registered,phone=id)
            user_data.delete()
            return redirect('/main_admin/user_list/')
        else:
            delete_bank = get_object_or_404(bank_data,id=id)
            delete_bank.delete()
            return redirect('/main_admin/bank_list/')
    else:
        return redirect('/main_admin/')

def edit(request,id):
    if request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        edit_bank = get_object_or_404(bank_data,id=id)
        if request.method == "POST":
            bank_detail = bank_data(id=id)
            bank_detail.bankname =  request.POST.get('bankname')
            bank_detail.pincode =  request.POST.get('pincode')
            bank_detail.city =  request.POST.get('city')
            bank_detail.state =  request.POST.get('state')
            bank_detail.district = request.POST.get('district') 
            bank_detail.save()
            return redirect('/main_admin/bank_list/')   
        return render(request,'main_admin_management/editbank.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username,'editbank':edit_bank})
    else:
        return redirect('/main_admin/')

def user_list(request):
    if request.session.has_key('main_admin'):
        user_detail = user_registered.objects.all()
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        return render(request,'main_admin_management/userlist.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username,'user_data1':user_detail})
    else:
        return redirect('/main_admin/')

def add_main(request):
    if request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        if request.method == "POST":
            main_bank_id = password_generator(8)
            field_name = request.POST.get('mainbank')
            bank_detail = main_bank(main_bank_id=main_bank_id,bankname=field_name)
            bank_detail.save()
            return redirect('/main_admin/bank_list/')
        return render(request,'main_admin_management/add_main.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username})
    else:
        return redirect('/main_admin/')

def bank_list(request):
    if request.session.has_key('main_admin'):
        bank_detail = main_bank.objects.all()
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        return render(request,'main_admin_management/bank_list.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username,'main_bank_data':bank_detail})
    else:
        return redirect('/main_admin/')

def add_blog_category(request):
    if request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        if request.method == "POST":
            category = request.POST.get('category')
            cat_data = blog_category(category_name=category)
            cat_data.save()
            return redirect('/main_admin/add_blog/')
        return render(request,'main_admin_management/add_blog_category.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username})
    else:
        return redirect('/main_admin/')
        
def add_blog(request):
    if request.session.has_key('main_admin'):
        admin_data = get_object_or_404(main_admin,id=request.session['main_admin'])
        all_category = blog_category.objects.all() 
        if request.method =="POST":
            b_category = request.POST.get('category')
            b_image = request.FILES.get('image')
            b_subject = request.POST.get('subject')
            b_tag = request.POST.get('tag')
            b_description = request.POST.get('description')
            b_date = datetime.date.today()
            b_time = datetime.datetime.now().time()
            b_data = blog_detail(b_category=b_category,b_image=b_image,b_subject=b_subject,b_tag=b_tag,b_description=b_description,b_date=b_date,b_time=b_time)
            b_data.save()
            len_blog = blog_detail.objects.filter(b_category=b_category)
            add_no_blog = blog_category.objects.filter(category_name=b_category).update(add_blog_in=len(len_blog))
            return redirect('/main_admin/add_blog/')
        return render(request,'main_admin_management/add_blog.html',{'main_admin_id':admin_data.pk,'main_admin_name':admin_data.username,'all_category':all_category})
    else:
        return redirect('/main_admin/')