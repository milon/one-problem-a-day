---
extends: _layouts.post
section: content
title: Roman to integer
problemUrl: https://leetcode.com/problems/roman-to-integer/
date: 2022-08-15
categories: [math-and-geometry]
---

We can replace characters like `IV` or `IX` to `IIII` and `VIIII`. In that way, when we calculate our result, we can just translate the value to integer withour any prior calculations. We will have a hashmap to have translate all the roman numerals to integer values, and sum this up to return as result.

```python
class Solution:
    def romanToInt(self, s: str) -> int:
        translations = {
            "I": 1,
            "V": 5,
            "X": 10,
            "L": 50,
            "C": 100,
            "D": 500,
            "M": 1000
        }
        
        s = s.replace('IV', 'IIII') \
             .replace('IX', 'VIIII') \
             .replace('XL', 'XXXX') \
             .replace('XC', 'LXXXX') \
             .replace('CD', 'CCCC') \
             .replace('CM', 'DCCCC')
        
        return sum(map(translations.get, s))
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`