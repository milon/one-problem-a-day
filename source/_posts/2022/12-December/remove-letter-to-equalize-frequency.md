---
extends: _layouts.post
section: content
title: Remove letter to equalize frequency
problemUrl: https://leetcode.com/problems/remove-letter-to-equalize-frequency/
date: 2022-12-30
categories: [array-and-hashmap]
---

We will count the frequency of each letter. Then we will find the minimum and maximum frequency. If the minimum frequency is equal to the maximum frequency, then we can remove any letter. Otherwise, we will remove the letter with the maximum frequency.

```python
class Solution:
    def equalFrequency(self, word: str) -> bool:
        count = collections.Counter(word)
        for ch in word:
            count[ch] -= 1
            
            if count[ch] == 0:
                count.pop(ch)
                
            if len(set(count.values())) == 1:
                return True
            
            count[ch] += 1
        
        return False
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`