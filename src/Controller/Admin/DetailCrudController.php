<?php

namespace App\Controller\Admin;

use App\Entity\Detail;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class DetailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Detail::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('ncom');
        yield AssociationField::new('npro');
        yield IntegerField::new('qcom');
    }
}
