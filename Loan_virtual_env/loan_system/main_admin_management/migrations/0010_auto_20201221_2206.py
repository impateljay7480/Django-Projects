# Generated by Django 3.1.3 on 2020-12-21 16:36

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('main_admin_management', '0009_auto_20201221_2202'),
    ]

    operations = [
        migrations.AlterField(
            model_name='main_bank',
            name='bankname',
            field=models.CharField(blank=True, max_length=20),
        ),
    ]
