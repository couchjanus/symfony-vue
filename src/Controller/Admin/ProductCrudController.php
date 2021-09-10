<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
//use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\{TextField, TextEditorField, NumberField, IntegerField, AssociationField, FormField, ImageField, Field};
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('name'),
            NumberField::new('price'),
            IntegerField::new('stock_quantity'),

            TextEditorField::new('description'),

            FormField::addPanel("Brands"),
            AssociationField::new('brand')
            ->setRequired(true)
            ->setHelp("Choise brand"),

            FormField::addPanel("Categories"),
            AssociationField::new('category')
                ->setRequired(true)
                ->setHelp("Choise category"),

            ImageField::new('image_name')->setBasePath($this->getParameter('app.path.product_images'))->onlyOnIndex(),

            Field::new('imageFile')->SetFormType(VichImageType::class)->onlyOnForms()

        ];
    }
}
