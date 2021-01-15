from django.shortcuts import render,redirect,get_object_or_404
from user_management.models import loan_request_list
from login_management.models import user_registered
from main_admin_management.models import main_bank
# Create your views here.
def apply(request):
    if request.session.has_key('id'):
        user_data = get_object_or_404(user_registered,pk=request.session['id'])
        bank_name = main_bank.objects.all()
        if request.method == "POST":
            # bank_name_list=[]
            # for i in bank_name:
            #     bank_name_list.append(i.bankname)
            # print(bank_name_list)
            bank_list = list(map(lambda x:request.POST.get(x.bankname),bank_name))
            # print(bank_list)
            final = filter(None,bank_list)
            # print(final)
            bank_list_in_str = ','.join(final)
            # print(bank_list_in_str)
            u_primery_id = user_data.u_primery_id
            field_name =['loantype','firstname','lastname','radio','email','phone','maritalstatus','dob','professional','address','city','district','state','pincode','income','l_amount','l_tenure','l_interest_rate']
            save_field = list(map(lambda x:request.POST.get(x),field_name))
            apply_data = loan_request_list(u_primery_id=u_primery_id,loantype=save_field[0],firstname=save_field[1],lastname=save_field[2],radio=save_field[3],email=save_field[4],phone=save_field[5],maritalstatus=save_field[6],dob=save_field[7],professional=save_field[8],address=save_field[9],city=save_field[10],district=save_field[11],state=save_field[12],pincode=save_field[13],income=save_field[14],l_amount=save_field[15],l_tenure=save_field[16],l_interest_rate=save_field[17],b1=bank_list_in_str)
            apply_data.save()
            return redirect('/')
        return render(request,'user_management/apply.html',{'id':user_data.pk,'user_data':user_data.firstname,'bank_name':bank_name})
    return redirect('/')

def loan_status(request):
    if request.session.has_key('id'):
        user_data = get_object_or_404(user_registered,pk=request.session['id'])
        loan_details = loan_request_list.objects.filter(u_primery_id = user_data.u_primery_id)
        return render(request,'user_management/loan_status.html',{'id':user_data.pk,'user_data':user_data.firstname,'loan_detail':loan_details})
    else:
        return redirect('/')