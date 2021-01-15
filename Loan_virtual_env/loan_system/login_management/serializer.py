from  rest_framework import serializers
from login_management.models import user_registered,contact_us

class user_serializer(serializers.ModelSerializer):
    # url = serializers.HyperlinkedIdentityField(view_name="login_management:user_registered-detail")
    class Meta:
        model = user_registered
        fields = ['firstname','lastname','email']

class contact_us_serializer(serializers.HyperlinkedModelSerializer):
    url = serializers.HyperlinkedIdentityField(view_name="login_management:contact_us-detail")
    class Meta:
        model = contact_us
        fields = '__all__'