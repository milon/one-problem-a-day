---
extends: _layouts.post
section: content
title: Check whether two strings are almost equivalent
problemUrl: https://leetcode.com/problems/check-whether-two-strings-are-almost-equivalent/
date: 2022-12-13
categories: [array-and-hashmap]
---

We will merge all the characters of the string to a hash set and we will keep on iterating over the characters of the set. Then we count the difference between the characters of the string and the characters of the set. If the difference is greater than 3, we will return `False`. At the end, we will return `True`.

```python
class Solution:
    def checkAlmostEquivalent(self, word1: str, word2: str) -> bool:
        word = set(word1 + word2)
        for ch in word:
            if abs(word1.count(ch) - word2.count(ch)) > 3:
                return False
        return True
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`

We can also do it in a different way. We will use a hashmap to store the seen values. We will iterate over the word1 and increase the count and then we will iterate over the word2 and decrease the count. If the count is greater than 3, we will return `False`. At the end, we will return `True`.

```python
class Solution:
    def checkAlmostEquivalent(self, word1: str, word2: str) -> bool:
        seen = collections.defaultdict(int)
        for ch in word1:
            seen[ch] += 1
        for ch in word2:
            seen[ch] -= 1
            if seen[ch] < -3:
                return False
        return True
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`