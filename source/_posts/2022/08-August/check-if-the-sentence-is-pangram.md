---
extends: _layouts.post
section: content
title: Check if the sentence is pangram
problemUrl: https://leetcode.com/problems/check-if-the-sentence-is-pangram/
date: 2022-08-21
categories: [array-and-hashmap]
---

We will count each character and add it to a hashmap. If the number of characters are equal to 26, we return true otherwise return false.

```python
class Solution:
    def checkIfPangram(self, sentence: str) -> bool:
        count = collections.Counter(sentence)
        return len(count) == 26
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`