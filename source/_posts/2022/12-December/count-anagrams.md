---
extends: _layouts.post
section: content
title: Count anagrams
problemUrl: https://leetcode.com/problems/count-anagrams/
date: 2022-12-25
categories: [math-and-geometry]
---

It is obvious that the answer is the product of the number of unique permutations for each word in a sentence. The last one is just the number of permutations of all letters (treating same letters as distinct, i.e. n!) corrected (divided) by the number of permutations within each group of same letters.

```python
class Solution:
    def countAnagrams(self, s: str) -> int:
        res = 1
        for word in s.split():
            res *= math.factorial(len(word))
            for ch, count in collections.Counter(word).items():
                res //= math.factorial(count)
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`