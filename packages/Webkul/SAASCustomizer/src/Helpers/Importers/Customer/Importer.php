<?php

namespace Webkul\SAASCustomizer\Helpers\Importers\Customer;

use Illuminate\Support\Facades\Validator;
use Webkul\DataTransfer\Helpers\Import;
use Webkul\DataTransfer\Helpers\Importers\Customer\Importer as BaseCustomerImporter;

class Importer extends BaseCustomerImporter
{
    /**
     * Validates row
     */
    public function validateRow(array $rowData, int $rowNumber): bool
    {
        /**
         * If row is already validated than no need for further validation
         */
        if (isset($this->validatedRows[$rowNumber])) {
            return ! $this->errorHelper->isRowInvalid($rowNumber);
        }

        $this->validatedRows[$rowNumber] = true;

        /**
         * If import action is delete than no need for further validation
         */
        if ($this->import->action == Import::ACTION_DELETE) {
            if (! $this->isEmailExist($rowData['email'])) {
                $this->skipRow($rowNumber, self::ERROR_EMAIL_NOT_FOUND_FOR_DELETE);

                return false;
            }

            return true;
        }

        /**
         * Check if customer group code exists
         */
        if (! $this->customerGroups->where('code', $rowData['customer_group_code'])->first()) {
            $this->skipRow($rowNumber, self::ERROR_INVALID_CUSTOMER_GROUP_CODE, 'customer_group_code');

            return false;
        }

        /**
         * Validate product attributes
         */
        $validator = Validator::make($rowData, [
            'customer_group_code' => 'required',
            'first_name'          => 'string|required',
            'last_name'           => 'string|required',
            'gender'              => 'required:in,Male,Female,Other',
            'email'               => 'required|email',
            'date_of_birth'       => 'date|before:today',
            'phone'               => 'string',
        ]);

        if ($validator->fails()) {
            $failedAttributes = $validator->failed();

            foreach ($validator->errors()->getMessages() as $attributeCode => $message) {
                $errorCode = array_key_first($failedAttributes[$attributeCode] ?? []);

                $this->skipRow($rowNumber, $errorCode, $attributeCode, current($message));
            }
        }

        /**
         * Check if email is unique
         */
        if (! in_array($rowData['email'], $this->emails)) {
            $this->emails[] = $rowData['email'];
        } else {
            $message = sprintf(
                trans($this->messages[self::ERROR_DUPLICATE_EMAIL]),
                $rowData['email']
            );

            $this->skipRow($rowNumber, self::ERROR_DUPLICATE_EMAIL, 'email', $message);
        }

        /**
         * Check if phone is unique
         */
        if (! in_array($rowData['phone'], $this->phones)) {
            if (! empty($rowData['phone'])) {
                $this->phones[] = $rowData['phone'];
            }
        } else {
            $message = sprintf(
                trans($this->messages[self::ERROR_DUPLICATE_PHONE]),
                $rowData['phone']
            );

            $this->skipRow($rowNumber, self::ERROR_DUPLICATE_PHONE, 'phone', $message);
        }

        return ! $this->errorHelper->isRowInvalid($rowNumber);
    }
}