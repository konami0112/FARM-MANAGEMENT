<?php

namespace Tests\Feature;

use App\Services\TextSummarizationService;
use Tests\TestCase;

class TextSummarizationTest extends TestCase
{
    public function test_extractive_summary()
    {
        $service = app(TextSummarizationService::class);
        $text = "The quick brown fox jumps over the lazy dog. This sentence contains all the letters in the English alphabet. It's often used for typing practice and testing fonts.";

        $summary = $service->extractiveSummary($text);

        $this->assertIsString($summary);
        $this->assertLessThan(strlen($text), strlen($summary));
    }

    public function test_abstractive_summary()
    {
        $service = app(TextSummarizationService::class);
        $text = "The Industrial Revolution was a period of major industrialization that began in the late 1700s and early 1800s. It marked a shift from agrarian societies to industrialized ones, with significant technological advancements like the steam engine and spinning jenny. This period transformed economic structures and living conditions worldwide.";

        $summary = $service->abstractiveSummary($text);

        $this->assertIsString($summary);
        $this->assertStringContainsString('Industrial Revolution', $summary);
    }

    public function test_evaluation_metrics()
    {
        $service = app(TextSummarizationService::class);
        $original = "The mitochondria is the powerhouse of the cell. It generates most of the cell's supply of adenosine triphosphate (ATP), used as a source of chemical energy.";
        $summary = "Mitochondria produce ATP, the cell's energy source.";

        $metrics = $service->evaluateSummary($original, $summary);

        $this->assertArrayHasKey('rouge_1', $metrics);
        $this->assertArrayHasKey('bleu', $metrics);
    }
}
