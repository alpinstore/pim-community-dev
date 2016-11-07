<?php

namespace spec\Pim\Component\Catalog\Denormalizer\Structured\ProductValue;

use PhpSpec\ObjectBehavior;

class BaseValueDenormalizerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            [
                'pim_catalog_identifier',
                'pim_catalog_boolean',
                'pim_catalog_text',
                'pim_catalog_textarea',
            ]
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Pim\Component\Catalog\Denormalizer\Structured\ProductValue\BaseValueDenormalizer');
    }

    function it_is_a_denormalizer()
    {
        $this->shouldBeAnInstanceOf('Symfony\Component\Serializer\Normalizer\DenormalizerInterface');
    }

    function it_supports_denormalization_of_basic_values_from_json()
    {
        $this->supportsDenormalization([], 'pim_catalog_number', 'standard')->shouldReturn(false);
        $this->supportsDenormalization([], 'pim_catalog_text', 'standard')->shouldReturn(true);
        $this->supportsDenormalization([], 'pim_catalog_price_collection', 'standard')->shouldReturn(false);
        $this->supportsDenormalization([], 'pim_catalog_boolean', 'csv')->shouldReturn(false);
    }

    function it_returns_data_without_any_modifications()
    {
        $this->denormalize('foo', 'pim_catalog_text', 'standard')->shouldReturn('foo');
        $this->denormalize(1, 'pim_catalog_boolean', 'standard')->shouldReturn(1);
    }

    function it_returns_null_if_data_is_an_empty_string()
    {
        $this->denormalize('', 'pim_catalog_text', 'standard')->shouldReturn(null);
    }
}
