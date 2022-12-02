---
extends: _layouts.post
section: content
title: Determine if two strings are close
problemUrl: https://leetcode.com/problems/determine-if-two-strings-are-close/
date: 2022-12-02
categories: [array-and-hashmap]
---

We will check if the two strings are equal. If they are not equal, then we will return false. If they are equal, then we will check if the frequency of each character in the two strings are equal. If they are not equal, then we will return false. If they are equal, then we will check if the frequency of each character in the two strings are equal. If they are not equal, then we will return false. If they are equal, then we will return true.

```python
class Solution:
    def closeStrings(self, word1: str, word2: str) -> bool:
        c1 = collections.Counter(word1)
        c2 = collections.Counter(word2)

        count1 = sorted(c1.values())
        count2 = sorted(c2.values())

        set1 = set(word1)
        set2 = set(word2)

        if count1 == count2 and set1 == set2:
            return True

        return False
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`

We can achieve it with a single line of code:

```python
class Solution:
    def closeStrings(self, word1: str, word2: str) -> bool:
        c1 = collections.Counter(word1)
        c2 = collections.Counter(word2)
        return sorted(c1.values()) == sorted(c2.values()) and sorted(c1.keys()) == sorted(c2.keys())
```

