---
extends: _layouts.post
section: content
title: Design hashset
problemUrl: https://leetcode.com/problems/design-hashset/
date: 2022-11-28
categories: [design, array-and-hashmap]
---

We will use a boolean array to store the values. We will use the value as the index of the array and set the value to `true` if the value is added and `false` if the value is removed.

```python
class MyHashSet:
    def __init__(self):
        self.hashset = [False] * 1000001

    def add(self, key: int) -> None:
        self.hashset[key] = True

    def remove(self, key: int) -> None:
        self.hashset[key] = False

    def contains(self, key: int) -> bool:
        return self.hashset[key]
```

Time complexity: `O(1)` <br/>
Space complexity: `O(n)`, n is the number of values

We can use hashset to store the values. Then we can use the `add`, `remove` and `contains` methods of the hashset.

```python
class MyHashSet:
    def __init__(self):
        self.hashset = set()

    def add(self, key: int) -> None:
        self.hashset.add(key)

    def remove(self, key: int) -> None:
        self.hashset.discard(key)

    def contains(self, key: int) -> bool:
        return key in self.hashset
```

Time complexity: `O(1)` <br/>
Space complexity: `O(n)`, n is the number of values