from django.shortcuts import render,get_object_or_404,redirect
from main_admin_management.models import bank_data,main_bank
from user_management.models import loan_request_list
from django.contrib import messages
from django.db.models import Q

# Create your views here.

def bank_admin(request):
    if request.method == "POST":
        try:
            bank_login = get_object_or_404(bank_data,bankcode = request.POST.get('bankcode'))
            if bank_login.password == request.POST.get('password'):
                request.session['bank_admin'] = bank_login.pk
                return render(request,'login_management/index.html',{'bank_admin_id':bank_login.pk,'bank_name':bank_login.bankname})
            else:
                messages.info(request,"Please Enter Valid Password")
                return redirect('/bank_admin/')
        except:
            messages.info(request,'Please Enter Valid Bank Code')
            return redirect('/bank_admin/')
    return render(request,'bank_admin_management/bank_admin_index.html')

def loan_list(request):
    if request.session.has_key('bank_admin'):
        bank_login = get_object_or_404(bank_data,id=request.session['bank_admin'])
        main_bank_id = get_object_or_404(main_bank, bankname=bank_login.bankname)
        if loan_request_list.objects.filter(pincode=bank_login.pincode).exists():
            pincode_loan_list = loan_request_list.objects.filter(pincode=bank_login.pincode)
            # m = main_bank_id.main_bank_id
            final_loan_list = loan_request_list.objects.filter(Q(b1__contains=main_bank_id.main_bank_id) & Q(pincode=bank_login.pincode))
            print(final_loan_list)
            # check_city = loan_request_list.objects.filter(pincode=bank_login.pincode)
            return render(request,'bank_admin_management/loan_list.html',{'bank_admin_id':bank_login.pk,'bank_name':bank_login.bankname,'loan_list':final_loan_list})
        return render(request,'bank_admin_management/loan_list.html',{'bank_admin_id':id})
    else:
        return redirect('/bank_admin/')

def loan_detail(request,id):
    if request.session.has_key('bank_admin'):
        bank_login = get_object_or_404(bank_data,id=request.session['bank_admin'])
        loan_detail = get_object_or_404(loan_request_list,id=id)
        return render(request,'bank_admin_management/loan_detail.html',{'bank_admin_id':bank_login.pk,'bank_name':bank_login.bankname,'loan_detail':loan_detail})
    else:
        return redirect('/bank_admin/')

def not_approve(request,id):
    if request.session.has_key('bank_admin'):
        loan_request_list.objects.filter(pk=id).update(approved_loan='False')
        return redirect('/bank_admin/loan_list/')
    else:
        return redirect('/bank_admin/')

def approve(request,id):
    if request.session.has_key('bank_admin'):
        loan_request_list.objects.filter(pk=id).update(approved_loan='True')
        return redirect('/bank_admin/loan_list/')
    else:
        return redirect('/bank_admin/')
