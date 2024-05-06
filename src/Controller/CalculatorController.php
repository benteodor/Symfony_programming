<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CalculatorController extends AbstractController {
    #[Route('/calculator', name: 'calculator')]
    public function calculator(Request $req): Response {
        $num1 = floatval($req->get("first_number"));
        $num2 = floatval($req->get("second_number"));
        $operator = $req->get("operator");

        switch ($operator) {
            case "+":
                $result =  ($num1 + $num2);
                break;
            case "−":
                $result =  ($num1 - $num2);
                break;
            case "×":
                $result =  ($num1 * $num2);
                break;
            case "÷":
                $result = $num2 == 0 ? "undefine" : ($num1 / $num2);
                break;
        }

        return $this->render('calculator/calculator.html.twig', [
            'first_number' => $num1,
            'second_number' => $num2,
            'operator' => $operator,
            'result' => round($result ?? null, 3)
        ]);
    }
}
