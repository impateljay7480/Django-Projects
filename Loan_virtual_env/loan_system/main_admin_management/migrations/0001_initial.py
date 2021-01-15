# Generated by Django 3.1.3 on 2020-12-21 04:37

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='bank_data',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('bankname', models.CharField(max_length=20)),
                ('pincode', models.CharField(max_length=6)),
                ('state', models.CharField(max_length=15)),
                ('city', models.CharField(max_length=15)),
                ('district', models.CharField(default='', max_length=20)),
                ('bankcode', models.CharField(default='', max_length=10)),
                ('password', models.CharField(default='', max_length=10)),
                ('mainbank', models.BooleanField(blank=True, default=False)),
            ],
        ),
        migrations.CreateModel(
            name='main_admin',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('username', models.CharField(max_length=12)),
                ('password', models.CharField(max_length=15)),
            ],
        ),
    ]