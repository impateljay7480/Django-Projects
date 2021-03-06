# Generated by Django 3.1.3 on 2020-12-23 08:45

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('main_admin_management', '0016_blog_category'),
    ]

    operations = [
        migrations.CreateModel(
            name='blog_detail',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('b_category', models.CharField(max_length=20)),
                ('b_subject', models.CharField(max_length=200)),
                ('b_tag', models.CharField(max_length=20)),
                ('b_description', models.CharField(max_length=2000)),
                ('b_date', models.DateField()),
                ('b_time', models.TimeField()),
            ],
        ),
    ]
