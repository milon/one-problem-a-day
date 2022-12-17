---
extends: _layouts.post
section: content
title: Apply discount to prices
problemUrl: https://leetcode.com/problems/apply-discount-to-prices/
date: 2022-12-17
categories: [array-and-hashmap]
---

We will split the sentence into words. Then we will iterate through the words, and for each word, if we found a word with the `$` prefix, we will replace the amount with the discounted amount. Otherwise, we will just append the word to the result.

```python
class Solution:
    def discountPrices(self, sentence: str, discount: int) -> str:
        strings = sentence.split(' ')
        result = []
        
        for string in strings:
            if string[0] == '$': 
                tmp = string[1:]
                tmp.replace('.', '')
                if tmp.isdigit(): 
                    new = (float) (string[1:]) * ((100-discount)/100) 
                    new = "$" + "{:.2f}".format(new)
                    result.append(new)
                else:
                    result.append(string)
            else:
                result.append(string)
        
        return " ".join(result)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`