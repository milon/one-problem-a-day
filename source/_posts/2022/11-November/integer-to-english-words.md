---
extends: _layouts.post
section: content
title: Integer to english words
problemUrl: https://leetcode.com/problems/integer-to-english-words/
date: 2022-11-23
categories: [array-and-hashmap, greedy]
---

We can use a hashmap to store the mapping from number to english words. Then we can use greedy to find the optimal solution.

```python
class Solution:
    def numberToWords(self, num: int) -> str:
        to19 = 'One Two Three Four Five Six Seven Eight Nine Ten Eleven Twelve ' \
           'Thirteen Fourteen Fifteen Sixteen Seventeen Eighteen Nineteen'.split()
        
        tens = 'Twenty Thirty Forty Fifty Sixty Seventy Eighty Ninety'.split()
        
        def words(n):
            if n < 20:
                return to19[n-1:n]
            if n < 100:
                return [tens[n//10-2]] + words(n%10)
            if n < 1000:
                return [to19[n//100-1]] + ['Hundred'] + words(n%100)
            for p, w in enumerate(('Thousand', 'Million', 'Billion'), 1):
                if n < 1000**(p+1):
                    return words(n//1000**p) + [w] + words(n%1000**p)
        
        return ' '.join(words(num)) or 'Zero'
```

Time complexity: `O(log(n))`, n is the value of num <br/>
Space complexity: `O(log(n))`